CREATE DATABASE tenant_management;
USE tenant_management;

CREATE TABLE stalls (
    StallID VARCHAR(10) PRIMARY KEY,
    StallOwner VARCHAR(255) DEFAULT NULL,
    Description TEXT DEFAULT NULL,
    Fee DECIMAL(10,2) NOT NULL,
    Availability BOOLEAN NOT NULL
);

INSERT INTO stalls (StallID, StallOwner, Description, Fee, Availability) VALUES
('S01', NULL, 'Near entrance, high visibility', 500.00, TRUE),
('S02', NULL, 'Corner stall, medium space', 450.00, TRUE),
('S03', 'John Doe', 'Food stall, includes equipment', 600.00, FALSE),
('S04', NULL, 'Close to restrooms', 400.00, TRUE),
('S05', NULL, 'Spacious stall in main area', 550.00, TRUE);

