@echo off
title Lançando E-Lixo Zero via Ngrok...
color 0A
echo ===================================================
echo      LISBOA E-LIXO ZERO - NGROK TUNNEL
echo ===================================================
echo.
echo [INFO] Verifique se o Apache (XAMPP) esta ATIVO.
echo [INFO] Ngrok vai mapear a porta 80 (HTTP).
echo.
echo [URL LOCAL DETETADA]: http://localhost/website/elixo-zero/
echo.
echo Pressione qualquer tecla para abrir o tunel...
pause > nul
echo.
echo [PROCESSO] A iniciar Ngrok... 
echo [DICA] Apos iniciar, copie o link "https://gout-unsold-gift.ngrok-free.dev/website/elixo-zero/" (ex: https://xxxx.ngrok-free.app)
echo [DICA] Adicione "/website/elixo-zero/" ao final do link para abrir o site.
echo.
ngrok http 80
if %errorlevel% neq 0 (
    echo.
    echo [ERRO] Ngrok nao encontrado no seu sistema.
    echo [AJUDA] Certifique-se que o 'ngrok.exe' esta no PATH ou nesta pasta.
    pause
)
