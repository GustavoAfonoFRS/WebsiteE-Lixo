import mysql.connector
import sys
import io


if sys.platform == "win32":
    sys.stdout = io.TextIOWrapper(sys.stdout.buffer, encoding='utf-8')

def setup_database():
    config = {
        'user': 'root',
        'password': '',
        'host': '127.0.0.1',
    }

    try:
   
        print(" A ligar ao MySQL...")
        conn = mysql.connector.connect(**config)
        cursor = conn.cursor()

      
        print(" A criar base de dados 'elixo_zero_lisboa'...")
        cursor.execute("CREATE DATABASE IF NOT EXISTS elixo_zero_lisboa CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci")
        cursor.execute("USE elixo_zero_lisboa")

      
        print(" A ler o ficheiro database.sql...")
        with open('database.sql', 'r', encoding='utf-8') as f:
            sql_commands = f.read().split(';')

        
        print("🚀 A executar comandos SQL...")
        for command in sql_commands:
            if command.strip():
                try:
                    cursor.execute(command)
                    print(f"  [OK] Comando executado.")
                except mysql.connector.Error as e:
                    print(f"  [ERRO] Falha no comando: {e}")

        conn.commit()
        print("\n Base de dados configurada com sucesso!")
        print(" Pode agora abrir o site em http://localhost/elixo-zero/")

    except mysql.connector.Error as err:
        print(f" Erro: {err}")
        print("\nCertifique-se que o MySQL (XAMPP) está ligado.")
    except FileNotFoundError:
        print(" Ficheiro database.sql não encontrado!")
    finally:
        if 'conn' in locals() and conn.is_connected():
            cursor.close()
            conn.close()

if __name__ == "__main__":
    setup_database()
