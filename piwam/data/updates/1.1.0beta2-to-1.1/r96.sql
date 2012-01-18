
-- Changing years of validity by months of validity

UPDATE `cotisation_type` SET valide = 12 * valide;