/* Databasename Reservation */
CREATE TABLE reservations
(
    id INT
    AUTO_INCREMENT PRIMARY KEY,
    customername VARCHAR
    (255) NOT NULL,
    contactnumber VARCHAR
    (20) NOT NULL,
    startdate DATE NOT NULL,
    enddate DATE NOT NULL,
    roomtype VARCHAR
    (50) NOT NULL,
    roomcapacity VARCHAR
    (50) NOT NULL,
    paymenttype VARCHAR
    (50) NOT NULL
);
