
-- --------------------------------------------------------

--
-- Structure de la table `ecrit`
--

CREATE TABLE `ecrit` (
  `idUtil` int(11) NOT NULL,
  `idPost` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Contenu de la table `ecrit`
--

INSERT INTO `ecrit` (`idUtil`, `idPost`) VALUES
(1, 1),
(1, 2),
(1, 3),
(1, 4),
(3, 5),
(3, 6),
(5, 7);
