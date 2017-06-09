
-- --------------------------------------------------------

--
-- Structure de la table `chatdans`
--

CREATE TABLE `chatdans` (
  `idutil` int(11) NOT NULL,
  `idroom` int(11) NOT NULL,
  `couleur` varchar(6) COLLATE utf8_unicode_ci NOT NULL DEFAULT 'black'
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Contenu de la table `chatdans`
--

INSERT INTO `chatdans` (`idutil`, `idroom`, `couleur`) VALUES
(116, 1, 'red'),
(117, 1, 'black'),
(116, 2, 'black'),
(115, 2, 'teal');
