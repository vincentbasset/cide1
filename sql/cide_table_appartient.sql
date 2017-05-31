
-- --------------------------------------------------------

--
-- Structure de la table `appartient`
--

CREATE TABLE `appartient` (
  `idUtil` int(11) NOT NULL,
  `idGroupe` int(11) NOT NULL,
  `droit` varchar(10) COLLATE utf8_unicode_ci NOT NULL DEFAULT 'membre'
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Contenu de la table `appartient`
--

INSERT INTO `appartient` (`idUtil`, `idGroupe`, `droit`) VALUES
(1, 1, 'membre'),
(2, 1, 'membre'),
(3, 1, 'admin'),
(1, 2, 'membre'),
(1, 3, 'admin'),
(5, 1, 'membre');
