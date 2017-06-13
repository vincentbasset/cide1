
-- --------------------------------------------------------

--
-- Structure de la table `chat`
--

CREATE TABLE `chat` (
  `id` int(11) NOT NULL,
  `idUtil1` int(11) DEFAULT NULL,
  `idUtil2` int(11) DEFAULT NULL,
  `message` varchar(250) COLLATE utf8_unicode_ci DEFAULT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `lien` varchar(150) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Contenu de la table `chat`
--

INSERT INTO `chat` (`id`, `idUtil1`, `idUtil2`, `message`, `date`, `lien`) VALUES
(1, 115, 114, 'coucou', '2017-06-06 15:18:35', NULL),
(2, 114, 115, 'salut', '2017-06-06 15:18:35', NULL),
(3, 115, 114, 'hello', '2017-06-06 15:18:49', NULL);
