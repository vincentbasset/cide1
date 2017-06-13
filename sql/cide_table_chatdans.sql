
-- --------------------------------------------------------

--
-- Structure de la table `chatdans`
--

CREATE TABLE `chatdans` (
  `idutil` int(11) NOT NULL,
  `idroom` int(11) NOT NULL,
  `couleur` varchar(6) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Déclencheurs `chatdans`
--
DELIMITER $$
CREATE TRIGGER `after_chatdans_delete` AFTER DELETE ON `chatdans` FOR EACH ROW BEGIN 
 IF ((SELECT COUNT(idroom) FROM chatdans WHERE idroom=old.idroom)<1) 
 THEN 
 DELETE FROM chatroom WHERE chatroom.id = old.idroom;
 END IF;
 END
$$
DELIMITER ;
