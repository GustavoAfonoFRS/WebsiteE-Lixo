import mysql.connector

def check():
    config = {
        'user': 'root',
        'password': '',
        'host': '127.0.0.1',
        'database': 'elixo_zero_lisboa'
    }
    try:
        conn = mysql.connector.connect(**config)
        cursor = conn.cursor()
        cursor.execute("SHOW TABLES")
        tables = cursor.fetchall()
        print("Tables in 'elixo_zero_lisboa':")
        for (table,) in tables:
            print(f"- {table}")
        
        cursor.execute("DESCRIBE pontos_recolha")
        columns = cursor.fetchall()
        print("\nStructure of 'pontos_recolha':")
        for col in columns:
            print(col)
            
    except Exception as e:
        print(f"Error: {e}")
    finally:
        if 'conn' in locals() and conn.is_connected():
            cursor.close()
            conn.close()

if __name__ == "__main__":
    check()
