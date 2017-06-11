
-- --------------------------------------------------------

--
-- Structure de la table `chatmsg`
--

CREATE TABLE `chatmsg` (
  `id` int(11) NOT NULL,
  `idutil` int(11) DEFAULT NULL,
  `idroom` int(11) DEFAULT NULL,
  `message` text COLLATE utf8_unicode_ci NOT NULL,
  `chattime` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
