
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

--
-- Contenu de la table `chatmsg`
--

INSERT INTO `chatmsg` (`id`, `idutil`, `idroom`, `message`, `chattime`) VALUES
(140, 116, 69, 'bonjour', '2017-06-13 07:12:47'),
(141, 116, 69, 'hr', '2017-06-13 07:13:14'),
(142, 116, 69, 'me', '2017-06-13 07:13:21'),
(143, 116, 69, 'coucou', '2017-06-13 07:14:58'),
(144, 116, 69, 'zut', '2017-06-13 07:15:14'),
(148, 116, 71, 'cocou', '2017-06-13 09:10:00'),
(149, 116, 72, 'coucou', '2017-06-13 09:43:42');
