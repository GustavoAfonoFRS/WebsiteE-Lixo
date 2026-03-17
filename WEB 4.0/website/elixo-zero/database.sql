CREATE DATABASE IF NOT EXISTS elixo_zero_lisboa CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;
USE elixo_zero_lisboa;

-- Tabela de Pontos de Recolha
CREATE TABLE IF NOT EXISTS pontos_recolha (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nome VARCHAR(255) NOT NULL,
    morada VARCHAR(255) NOT NULL,
    freguesia VARCHAR(100) NOT NULL,
    latitude DECIMAL(10, 8) NOT NULL,
    longitude DECIMAL(11, 8) NOT NULL,
    tipo_residuo TEXT NOT NULL, -- Lista de tipos separados por vírgula ou JSON
    horario VARCHAR(255),
    link_oficial VARCHAR(255),
    data_criacao TIMESTAMP DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB;

-- Tabela de Utilizadores
CREATE TABLE IF NOT EXISTS utilizadores (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nome VARCHAR(100) NOT NULL,
    email VARCHAR(150) NOT NULL UNIQUE,
    password VARCHAR(255) NOT NULL,
    token_verificacao VARCHAR(100),
    email_verificado BOOLEAN DEFAULT FALSE,
    is_admin BOOLEAN DEFAULT FALSE,
    data_registo TIMESTAMP DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB;

-- Tabela de Mensagens de Contacto
CREATE TABLE IF NOT EXISTS mensagens (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nome VARCHAR(100) NOT NULL,
    email VARCHAR(150) NOT NULL,
    assunto VARCHAR(100) NOT NULL,
    mensagem TEXT NOT NULL,
    lida BOOLEAN DEFAULT FALSE,
    data_envio TIMESTAMP DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB;

-- Inserção de dados iniciais (Locais Obrigatórios)
INSERT INTO pontos_recolha (nome, morada, freguesia, latitude, longitude, tipo_residuo, horario, link_oficial) VALUES
('Centro de Receção de Resíduos (CML) - Monsanto', 'Estrada de Queluz, Monsanto', 'Benfica', 38.7285, -9.1925, 'Todos os REEE, Pilhas, Baterias', 'Seg-Sáb: 08:00-20:00', 'https://www.lisboa.pt'),
('Ecocentro da Valorsul - Lisboa', 'Avenida Dr. Augusto de Castro', 'Marvila', 38.7450, -9.1020, 'Grandes e Pequenos Eletrodomésticos, TV', 'Seg-Sex: 09:00-18:00', 'https://www.valorsul.pt'),
('Entrajuda - Banco de Equipamentos', 'Rua de Santa Cruz, Lote 1', 'Alcântara', 38.7050, -9.1780, 'Informática, Pequenos Domésticos', 'Dias úteis: 09:00-17:00', 'https://www.entrajuda.pt'),
('Ponto Eletrão - Colombo', 'Centro Comercial Colombo', 'Carnide', 38.7550, -9.1890, 'Pequenos Eletrodomésticos, Lâmpadas, Pilhas', 'Todos os dias: 10:00-24:00', 'https://www.electrao.pt'),
('Recolha CML - Estação de Transferência', 'Vale de Forno', 'Olivaes', 38.7750, -9.1150, 'REEE de grandes dimensões', 'Sob agendamento', 'https://www.lisboa.pt');
