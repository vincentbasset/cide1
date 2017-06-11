
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
(117, 26, 'membre'),
(116, 26, 'createur'),
(116, 1, 'membre'),
(116, 8, 'membre'),
(115, 1, 'membre'),
(115, 4, 'membre'),
(114, 4, 'membre');