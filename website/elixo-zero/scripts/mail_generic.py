import smtplib
import sys
import os
import json
from datetime import datetime
from email.mime.text import MIMEText
from email.mime.multipart import MIMEMultipart

def send_generic_email(recipient_email, subject, body_html):
    
    sender_email = "addhfdgdfdshfdah@gmail.com"
    sender_password = "bckc mdwp jikq sqdj"

    
    msg = MIMEMultipart()
    msg['From'] = f"E-Lixo Zero <{sender_email}>"
    msg['To'] = recipient_email
    msg['Subject'] = subject

    
    msg.attach(MIMEText(body_html, 'html'))

    log_path = os.path.join(os.path.dirname(os.path.dirname(__file__)), 'log_email.txt')
    try:
       
        server = smtplib.SMTP('smtp.gmail.com', 587)
        server.starttls()
        server.login(sender_email, sender_password)
        text = msg.as_string()
        server.sendmail(sender_email, recipient_email, text)
        server.quit()
        with open(log_path, 'a', encoding='utf-8') as f:
            f.write(f"[{datetime.now().strftime('%Y-%m-%d %H:%M:%S')}] Sucesso: Email enviado para {recipient_email} | Assunto: {subject}\n")
        return True
    except Exception as e:
        with open(log_path, 'a', encoding='utf-8') as f:
            f.write(f"[{datetime.now().strftime('%Y-%m-%d %H:%M:%S')}] Erro SMTP: {str(e)} | Para: {recipient_email}\n")
        return False

if __name__ == "__main__":
    try:
        if len(sys.argv) >= 2 and sys.argv[1].endswith('.json'):
            json_file = sys.argv[1]
            if not os.path.isabs(json_file):
                json_file = os.path.join(os.getcwd(), json_file)
                
            with open(json_file, 'r', encoding='utf-8') as f:
                data = json.load(f)
            recipient = data['recipient']
            subject = data['subject']
            body = data['body']
            
         
            try:
                os.remove(json_file)
            except:
                pass
        elif len(sys.argv) >= 4:
            recipient = sys.argv[1]
            subject = sys.argv[2]
            body = sys.argv[3]
        else:
            sys.exit(1)
            
        if send_generic_email(recipient, subject, body):
            sys.exit(0)
        else:
            sys.exit(1)
    except Exception as e:
        log_path = os.path.join(os.path.dirname(os.path.dirname(__file__)), 'log_email.txt')
        with open(log_path, 'a', encoding='utf-8') as f:
            f.write(f"[{datetime.now().strftime('%Y-%m-%d %H:%M:%S')}] Erro Script Python: {str(e)}\n")
        sys.exit(1)
