-- =====================================================
-- SEUP Modul - Tablica za Pošiljatelje / Suradnike
-- =====================================================
-- Tablica za evidenciju pošiljatelja, primatelja
-- i suradnika u uredskom poslovanju
-- =====================================================

CREATE TABLE IF NOT EXISTS llx_a_posiljatelji (
  rowid INT(11) NOT NULL AUTO_INCREMENT,

  -- Osnovni podaci
  naziv VARCHAR(255) NOT NULL COMMENT 'Naziv pošiljatelja/suradnika',
  adresa VARCHAR(255) DEFAULT NULL COMMENT 'Adresa',
  oib VARCHAR(32) DEFAULT NULL COMMENT 'OIB (jedinstveni)',
  telefon VARCHAR(64) DEFAULT NULL COMMENT 'Broj telefona',
  kontakt_osoba VARCHAR(255) DEFAULT NULL COMMENT 'Kontakt osoba',
  email VARCHAR(255) DEFAULT NULL COMMENT 'Email adresa',

  -- Metapodaci
  datec DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP COMMENT 'Datum kreiranja',
  tms TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP COMMENT 'Vrijeme zadnje promjene',
  entity INT(11) NOT NULL DEFAULT 1 COMMENT 'Multi-company entity ID',

  PRIMARY KEY (rowid),
  UNIQUE KEY uq_oib (oib),
  KEY idx_naziv (naziv),
  KEY idx_email (email),
  KEY idx_entity (entity)

) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci
COMMENT='Registar pošiljatelja i suradnika';
