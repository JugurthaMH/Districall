-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : mar. 03 déc. 2024 à 16:39
-- Version du serveur : 10.4.32-MariaDB
-- Version de PHP : 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `districall`
--

-- --------------------------------------------------------

--
-- Structure de la table `tache`
--

CREATE TABLE `tache` (
  `id` int(11) NOT NULL,
  `title` text NOT NULL,
  `description` text NOT NULL,
  `status` text NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `tache`
--

INSERT INTO `tache` (`id`, `title`, `description`, `status`, `created_at`, `updated_at`) VALUES
(14, 'Cuisine', 'Faire un plat pour le petit frère', 'En cours', '2024-12-03 16:25:49', '2024-12-03 16:25:49'),
(15, 'Répondre aux emails', 'Répondre à tous les emails urgents et vérifier les demandes en attente.', 'En cours', '2024-12-03 16:26:20', '2024-12-03 16:26:20'),
(16, 'Mise à jour du site web', 'Ajouter les nouvelles informations sur le site et corriger les erreurs signalées.', 'En cours', '2024-12-03 16:26:32', '2024-12-03 16:26:32'),
(17, 'Préparer la présentation pour le client', 'Créer la présentation pour la réunion de demain avec le client concernant le projet X.', 'En cours', '2024-12-03 16:26:45', '2024-12-03 16:26:45'),
(18, 'Revue du code', 'Examiner le code des autres développeurs pour identifier les erreurs ou les améliorations.', 'En cours', '2024-12-03 16:27:03', '2024-12-03 16:27:03'),
(19, 'Vérification des rapports financiers', 'Examiner les rapports financiers mensuels et préparer le document pour le directeur.', 'En cours', '2024-12-03 16:27:18', '2024-12-03 16:27:18'),
(20, 'Appels clients', 'Passer des appels pour suivre les demandes des clients et recueillir leurs retours.', 'En cours', '2024-12-03 16:27:32', '2024-12-03 16:27:32'),
(21, 'Mettre à jour les tâches dans le gestionnaire de projet', 'S&#039;assurer que toutes les tâches dans le gestionnaire de projet sont mises à jour avec les nouvelles dates.', 'En cours', '2024-12-03 16:27:46', '2024-12-03 16:27:46'),
(22, 'Organiser l&#039;agenda de la semaine prochaine', 'Planifier les réunions et les échéances pour la semaine prochaine et envoyer les invitations nécessaires.', 'En cours', '2024-12-03 16:28:00', '2024-12-03 16:28:00'),
(23, 'Formation interne', 'Participer à une session de formation interne pour apprendre de nouvelles pratiques en gestion de projet.', 'En cours', '2024-12-03 16:28:12', '2024-12-03 16:28:12'),
(24, 'Rendez-Vous', 'Organiser le rendez-vous avec les invités américains.', 'En cours', '2024-12-03 16:28:50', '2024-12-03 16:28:50');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `tache`
--
ALTER TABLE `tache`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `tache`
--
ALTER TABLE `tache`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
