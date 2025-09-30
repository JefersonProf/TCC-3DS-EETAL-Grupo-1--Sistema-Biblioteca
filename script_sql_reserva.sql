ALTER TABLE reservas 
ADD COLUMN status ENUM('reservado','fila') DEFAULT 'fila';
