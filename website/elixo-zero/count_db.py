import mysql.connector

def count_points():
    config = {
        'user': 'root',
        'password': '',
        'host': '127.0.0.1',
        'database': 'elixo_zero_lisboa'
    }
    try:
        conn = mysql.connector.connect(**config)
        cursor = conn.cursor()
        cursor.execute("SELECT COUNT(*) FROM pontos_recolha")
        count = cursor.fetchone()[0]
        print(f"Total points in database: {count}")
    except Exception as e:
        print(f"Error: {e}")
    finally:
        if 'conn' in locals() and conn.is_connected():
            cursor.close()
            conn.close()

if __name__ == "__main__":
    count_points()
