
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
-- Contenu de la table `chatdans`
--

INSERT INTO `chatdans` (`idutil`, `idroom`, `couleur`) VALUES
(115, 72, 'black'),
(114, 73, 'black'),
(114, 71, 'black'),
(1, 69, 'black'),
(1, 74, 'black'),
(114, 75, 'black');

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
