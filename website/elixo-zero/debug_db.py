import mysql.connector
import sys


import io
sys.stdout = io.TextIOWrapper(sys.stdout.buffer, encoding='utf-8')

def check_db():
    config = {
        'user': 'root',
        'password': '',
        'host': '127.0.0.1',
    }
    try:
        conn = mysql.connector.connect(**config)
        cursor = conn.cursor()
        
        cursor.execute("SHOW DATABASES LIKE 'elixo_zero_lisboa'")
        db_exists = cursor.fetchone()
        
        if db_exists:
            print("[OK] Base de dados 'elixo_zero_lisboa' existe.")
            cursor.execute("USE elixo_zero_lisboa")
            cursor.execute("SHOW TABLES LIKE 'pontos_recolha'")
            table_exists = cursor.fetchone()
            if table_exists:
                print("[OK] Tabela 'pontos_recolha' existe.")
            else:
                print("[ERRO] Tabela 'pontos_recolha' NAO existe.")
        else:
            print("[ERRO] Base de dados 'elixo_zero_lisboa' NAO existe.")
            
        cursor.close()
        conn.close()
    except Exception as e:
        print(f"[ERRO DIAGNOSTICO] Error: {str(e)}")

if __name__ == "__main__":
    check_db()
