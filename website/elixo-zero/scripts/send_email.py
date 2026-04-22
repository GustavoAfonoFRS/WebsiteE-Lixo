import smtplib
import sys
import json
import os
from datetime import datetime
from email.mime.text import MIMEText
from email.mime.multipart import MIMEMultipart

def send_email(nome, email, assunto, mensagem):

    sender_email = "addhfdgdfdshfdah@gmail.com" 
    sender_password = "gbqt xqcp ssxw mlpl" 
    receiver_email = "gustavot22221@gmail.com"


    msg = MIMEMultipart()
    msg['From'] = f"E-Lixo Zero <{sender_email}>"
    msg['To'] = receiver_email
    msg['Subject'] = f"Novo Contacto: {assunto}"

    body = f"Nome: {nome}\nEmail: {email}\n\nMensagem:\n{mensagem}"
    
    msg.attach(MIMEText(body, 'plain'))

    log_path = os.path.join(os.path.dirname(__file__), 'log_email.txt')
    try:
     
        server = smtplib.SMTP('smtp.gmail.com', 587)
        server.starttls()
        server.login(sender_email, sender_password)
        text = msg.as_string()
        server.sendmail(sender_email, receiver_email, text)
        server.quit()
        with open(log_path, 'a') as f:
            f.write(f"[{datetime.now().strftime('%Y-%m-%d %H:%M:%S')}] [{nome}] Sucesso: Email enviado para {receiver_email}\n")
        return True
    except Exception as e:
        with open(log_path, 'a') as f:
            f.write(f"[{datetime.now().strftime('%Y-%m-%d %H:%M:%S')}] [{nome}] Erro SMTP: {str(e)}\n")
        return False

if __name__ == "__main__":
    if len(sys.argv) >= 5:
        try:
            nome = sys.argv[1]
            email = sys.argv[2]
            assunto = sys.argv[3]
            mensagem = sys.argv[4]
            
            success = send_email(nome, email, assunto, mensagem)
            if success:
                sys.exit(0)
            else:
                sys.exit(1)
        except Exception as e:
            log_path = os.path.join(os.path.dirname(__file__), 'log_email.txt')
            with open(log_path, 'a') as f:
                f.write(f"[{datetime.now().strftime('%Y-%m-%d %H:%M:%S')}] Erro de Argumentos: {str(e)}\n")
            sys.exit(1)
    else:
        sys.exit(1)
