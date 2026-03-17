import json
import mysql.connector
import sys
import io

# Forcar encoding utf-8 para o console Windows
if sys.platform == "win32":
    sys.stdout = io.TextIOWrapper(sys.stdout.buffer, encoding='utf-8')

def import_data():
    # Nota: Como o JSON é enorme, o ideal é guardar o conteúdo que me enviou num ficheiro chamado 'pontos.json'
    # mas vou criar aqui a estrutura para processar o formato que forneceu.
    
    config = {
        'user': 'root',
        'password': '',
        'host': '127.0.0.1',
        'database': 'elixo_zero_lisboa'
    }

    try:
        conn = mysql.connector.connect(**config)
        cursor = conn.cursor()

        # Abrir o ficheiro com o JSON que copiou (guarde o conteúdo num ficheiro chamado pontos.json)
        with open('pontos.json', 'r', encoding='utf-8') as f:
            data = json.load(f)

        print(f"📦 Encontrados {len(data['features'])} pontos para importar...")

        query = """INSERT INTO pontos_recolha 
                   (nome, morada, freguesia, latitude, longitude, tipo_residuo, horario, link_oficial) 
                   VALUES (%s, %s, %s, %s, %s, %s, %s, %s)"""

        inserted = 0
        for feature in data['features']:
            props = feature['properties']
            geom = feature['geometry']
            
            # Mapeamento do GeoJSON para a nossa DB
            nome = f"{props.get('TPRS_DESC', 'Ponto de Recolha')} - {props.get('TOP_MOD_1', '')}"
            morada = props.get('TOP_MOD_1', 'Lisboa')
            local_especifico = props.get('PRSL_LOCAL', '')
            if local_especifico:
                morada += f" ({local_especifico})"
                
            freguesia = props.get('FRE_AB', 'Lisboa')
            lng, lat = geom['coordinates']
            
            # Como o projeto é E-Lixo, vamos marcar estes pontos como aptos para pequenos resíduos/reciclagem
            tipo = f"Reciclagem Geral ({props.get('TPRS_DESC', 'Ecoilha')})"
            horario = "24h (Público)"
            link = "https://www.lisboa.pt"

            cursor.execute(query, (nome, morada, freguesia, lat, lng, tipo, horario, link))
            inserted += 1

        conn.commit()
        print(f"✅ Sucesso! {inserted} novos pontos foram adicionados ao mapa.")

    except Exception as e:
        print(f"❌ Erro: {e}")
        print("\nCertifique-se que correu o 'python setup_db.py' primeiro!")
    finally:
        if 'conn' in locals() and conn.is_connected():
            cursor.close()
            conn.close()

if __name__ == "__main__":
    import_data()
