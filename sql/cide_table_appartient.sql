
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
(114, 8, 'admin'),
(114, 1, 'admin'),
(0, 4, 'membre'),
(0, 1, 'membre'),
(115, 8, 'admin'),
(115, 1, 'admin'),
(115, 26, 'admin'),
(115, 27, 'admin'),
(115, 28, 'admin'),
(115, 29, 'admin'),
(114, 26, 'membre'),
(114, 30, 'admin'),
(114, 31, 'admin'),
(114, 32, 'admin'),
(114, 33, 'admin'),
(114, 34, 'admin'),
(114, 35, 'admin'),
(114, 36, 'admin'),
(114, 37, 'admin'),
(115, 38, 'admin'),
(115, 39, 'admin'),
(115, 40, 'admin'),
(115, 41, 'admin'),
(115, 42, 'admin'),
(115, 44, 'admin'),
(115, 45, 'admin'),
(114, 46, 'admin'),
(116, 8, 'createur'),
(116, 1, 'membre'),
(116, 47, 'createur'),
(115, 48, 'createur'),
(115, 49, 'createur'),
(115, 50, 'createur'),
(115, 46, 'membre'),
(116, 46, 'membre'),
(114, 50, 'membre'),
(115, 51, 'createur'),
(1, 2, 'admin'),
(1, 1, 'admin'),
(1, 8, 'admin'),
(1, 9, 'admin'),
(1, 10, 'admin'),
(1, 7, 'admin'),
(1, 11, 'admin'),
(1, 12, 'admin'),
(1, 13, 'admin'),
(1, 6, 'admin'),
(1, 14, 'admin'),
(1, 15, 'admin'),
(1, 16, 'admin'),
(1, 17, 'admin'),
(1, 18, 'admin'),
(1, 19, 'admin'),
(1, 20, 'admin'),
(1, 21, 'admin'),
(1, 22, 'admin'),
(1, 23, 'admin'),
(1, 24, 'admin'),
(1, 25, 'admin'),
(1, 26, 'admin'),
(1, 5, 'admin'),
(1, 4, 'admin'),
(1, 3, 'admin'),
(116, 56, 'createur');
