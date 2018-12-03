-- phpMyAdmin SQL Dump
-- version 4.8.0.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 03-12-2018 a las 15:49:16
-- Versión del servidor: 10.1.32-MariaDB
-- Versión de PHP: 7.2.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `admin`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `archivos`
--

CREATE TABLE `archivos` (
  `id` int(10) UNSIGNED NOT NULL,
  `ruta` varchar(80) COLLATE utf8mb4_unicode_ci NOT NULL,
  `consecutivo` varchar(11) COLLATE utf8mb4_unicode_ci NOT NULL,
  `stores_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `bitacora_dependencias`
--

CREATE TABLE `bitacora_dependencias` (
  `id` int(10) UNSIGNED NOT NULL,
  `bitacoraDependencias_id` int(10) UNSIGNED NOT NULL,
  `nombreDependencias` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `codigoDependencias` varchar(11) COLLATE utf8mb4_unicode_ci NOT NULL,
  `action` varchar(11) COLLATE utf8mb4_unicode_ci NOT NULL,
  `users_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `bitacora_series`
--

CREATE TABLE `bitacora_series` (
  `id` int(10) UNSIGNED NOT NULL,
  `serie_id` int(10) UNSIGNED NOT NULL,
  `dependencias_id` int(10) UNSIGNED NOT NULL,
  `nombreSeries` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `codigoSeries` varchar(11) COLLATE utf8mb4_unicode_ci NOT NULL,
  `original` varchar(11) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `copia` varchar(11) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `soporte` varchar(11) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `gestion` varchar(11) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `central` varchar(11) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `ctfisico` varchar(11) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `ctelectronico` varchar(11) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `microfilmacion` varchar(11) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `digitalizacion` varchar(11) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `seleccion` varchar(11) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `eliminacion` varchar(11) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `action` varchar(11) COLLATE utf8mb4_unicode_ci NOT NULL,
  `users_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `bitacora_sub_series`
--

CREATE TABLE `bitacora_sub_series` (
  `id` int(10) UNSIGNED NOT NULL,
  `Subserie_id` int(10) UNSIGNED NOT NULL,
  `serie_id` int(10) UNSIGNED NOT NULL,
  `nombreSubSeries` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `codigoSubSeries` varchar(11) COLLATE utf8mb4_unicode_ci NOT NULL,
  `originalSubSeries` varchar(11) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `copiaSubSeries` varchar(11) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `soporteSubSeries` varchar(11) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `gestionSubSeries` varchar(11) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `centralSubSeries` varchar(11) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `ctfisicoSubSeries` varchar(11) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `ctelectronicoSubSeries` varchar(11) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `microfilmacionSubSeries` varchar(11) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `digitalizacionSubSeries` varchar(11) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `seleccionSubSeries` varchar(11) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `eliminacionSubSeries` varchar(11) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `action` varchar(11) COLLATE utf8mb4_unicode_ci NOT NULL,
  `users_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `centrals`
--

CREATE TABLE `centrals` (
  `id` int(10) UNSIGNED NOT NULL,
  `serie_id` int(10) UNSIGNED NOT NULL,
  `nombreSubSeries` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `codigoSubSeries` varchar(30) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `originalSubSeries` varchar(11) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `copiaSubSeries` varchar(11) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `soporteSubSeries` varchar(11) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `gestionSubSeries` varchar(11) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `centralSubSeries` varchar(11) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `ctfisicoSubSeries` varchar(11) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `ctelectronicoSubSeries` varchar(11) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `microfilmacionSubSeries` varchar(11) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `digitalizacionSubSeries` varchar(11) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `seleccionSubSeries` varchar(11) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `eliminacionSubSeries` varchar(11) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `estante` varchar(11) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `balda` varchar(11) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `caja` varchar(11) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `carpeta` varchar(11) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `dependencias`
--

CREATE TABLE `dependencias` (
  `id` int(10) UNSIGNED NOT NULL,
  `nombreDependencias` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `codigoDependencias` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(120) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(227, '2014_10_12_000000_create_users_table', 1),
(228, '2014_10_12_100000_create_password_resets_table', 1),
(229, '2015_01_20_084450_create_roles_table', 1),
(230, '2015_01_20_084525_create_role_user_table', 1),
(231, '2015_01_24_080208_create_permissions_table', 1),
(232, '2015_01_24_080433_create_permission_role_table', 1),
(233, '2015_12_04_003040_add_special_role_column', 1),
(234, '2017_10_17_170735_create_permission_user_table', 1),
(235, '2018_06_01_165031_create_dependencias_table', 1),
(236, '2018_06_05_140856_create_series_table', 1),
(237, '2018_06_07_192434_add_deleted_to_dependencias_table', 1),
(238, '2018_06_07_193534_add_deleted_to_series_table', 1),
(239, '2018_06_08_192057_create_bitacora_dependencias_table', 1),
(240, '2018_06_12_132953_create_bitacora_series_table', 1),
(241, '2018_06_12_152514_create_sub_series_table', 1),
(242, '2018_06_15_141048_create_timelines_table', 1),
(243, '2018_06_20_143808_create_bitacora_sub_series_table', 1),
(244, '2018_07_06_142106_create_stores_table', 1),
(245, '2018_07_26_153706_create_permisos_table', 1),
(246, '2018_09_03_141853_create_centrals_table', 1),
(247, '2018_09_20_144813_create_archivos_table', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(80) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(120) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `permisos`
--

CREATE TABLE `permisos` (
  `id` int(10) UNSIGNED NOT NULL,
  `ndependencias` varchar(2) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `cdependencias` varchar(2) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `edependencias` varchar(2) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `ddependencias` varchar(2) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `nseries` varchar(2) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `cseries` varchar(2) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `eseries` varchar(2) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `dseries` varchar(2) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `nsubseries` varchar(2) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `csubseries` varchar(2) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `esubseries` varchar(2) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `dsubseries` varchar(2) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `nusuarios` varchar(2) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `cusuarios` varchar(2) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `eusuarios` varchar(2) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `dusuarios` varchar(2) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `transferir` varchar(2) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `recivir` varchar(2) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `ver` varchar(2) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `permisos`
--

INSERT INTO `permisos` (`id`, `ndependencias`, `cdependencias`, `edependencias`, `ddependencias`, `nseries`, `cseries`, `eseries`, `dseries`, `nsubseries`, `csubseries`, `esubseries`, `dsubseries`, `nusuarios`, `cusuarios`, `eusuarios`, `dusuarios`, `transferir`, `recivir`, `ver`, `user_id`, `created_at`, `updated_at`) VALUES
(1, '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', 1, '2018-12-03 19:44:54', '2018-12-03 19:44:54');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `permissions`
--

CREATE TABLE `permissions` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(120) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(120) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `permission_role`
--

CREATE TABLE `permission_role` (
  `id` int(10) UNSIGNED NOT NULL,
  `permission_id` int(10) UNSIGNED NOT NULL,
  `role_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `permission_user`
--

CREATE TABLE `permission_user` (
  `id` int(10) UNSIGNED NOT NULL,
  `permission_id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `roles`
--

CREATE TABLE `roles` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(120) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(120) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `special` enum('all-access','no-access') COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `role_user`
--

CREATE TABLE `role_user` (
  `id` int(10) UNSIGNED NOT NULL,
  `role_id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `series`
--

CREATE TABLE `series` (
  `id` int(10) UNSIGNED NOT NULL,
  `dependencias_id` int(10) UNSIGNED NOT NULL,
  `nombreSeries` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `codigoSeries` varchar(30) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `original` varchar(11) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `copia` varchar(11) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `soporte` varchar(11) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `ctfisico` varchar(11) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `ctelectronico` varchar(11) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `microfilmacion` varchar(11) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `digitalizacion` varchar(11) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `seleccion` varchar(11) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `eliminacion` varchar(11) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `stores`
--

CREATE TABLE `stores` (
  `id` int(10) UNSIGNED NOT NULL,
  `nombre` varchar(150) COLLATE utf8mb4_unicode_ci NOT NULL,
  `asunto` varchar(150) COLLATE utf8mb4_unicode_ci NOT NULL,
  `fecha` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `radicado` varchar(80) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `unidad` varchar(80) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Subserie_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `sub_series`
--

CREATE TABLE `sub_series` (
  `id` int(10) UNSIGNED NOT NULL,
  `serie_id` int(10) UNSIGNED NOT NULL,
  `nombreSubSeries` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `codigoSubSeries` varchar(30) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `originalSubSeries` varchar(11) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `copiaSubSeries` varchar(11) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `soporteSubSeries` varchar(11) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `gestionSubSeries` varchar(11) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `centralSubSeries` varchar(11) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `ctfisicoSubSeries` varchar(11) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `ctelectronicoSubSeries` varchar(11) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `microfilmacionSubSeries` varchar(11) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `digitalizacionSubSeries` varchar(11) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `seleccionSubSeries` varchar(11) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `eliminacionSubSeries` varchar(11) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `estado` varchar(11) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `timelines`
--

CREATE TABLE `timelines` (
  `id` int(10) UNSIGNED NOT NULL,
  `tabla` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nombre` varchar(80) COLLATE utf8mb4_unicode_ci NOT NULL,
  `codigo` varchar(80) COLLATE utf8mb4_unicode_ci NOT NULL,
  `action` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `users_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(80) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(80) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(80) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'SenaComm', 'senacomm@gmail.com', '$2y$10$hgxOblM5bdLND3W4gS5rBubKgdaYO2Zwio7/7mg0O14zKjrOSzbVK', NULL, '2018-12-03 19:44:54', '2018-12-03 19:44:54');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `archivos`
--
ALTER TABLE `archivos`
  ADD PRIMARY KEY (`id`),
  ADD KEY `archivos_stores_id_foreign` (`stores_id`);

--
-- Indices de la tabla `bitacora_dependencias`
--
ALTER TABLE `bitacora_dependencias`
  ADD PRIMARY KEY (`id`),
  ADD KEY `bitacora_dependencias_bitacoradependencias_id_foreign` (`bitacoraDependencias_id`),
  ADD KEY `bitacora_dependencias_users_id_foreign` (`users_id`);

--
-- Indices de la tabla `bitacora_series`
--
ALTER TABLE `bitacora_series`
  ADD PRIMARY KEY (`id`),
  ADD KEY `bitacora_series_serie_id_foreign` (`serie_id`),
  ADD KEY `bitacora_series_dependencias_id_foreign` (`dependencias_id`),
  ADD KEY `bitacora_series_users_id_foreign` (`users_id`);

--
-- Indices de la tabla `bitacora_sub_series`
--
ALTER TABLE `bitacora_sub_series`
  ADD PRIMARY KEY (`id`),
  ADD KEY `bitacora_sub_series_subserie_id_foreign` (`Subserie_id`),
  ADD KEY `bitacora_sub_series_serie_id_foreign` (`serie_id`),
  ADD KEY `bitacora_sub_series_users_id_foreign` (`users_id`);

--
-- Indices de la tabla `centrals`
--
ALTER TABLE `centrals`
  ADD PRIMARY KEY (`id`),
  ADD KEY `centrals_serie_id_foreign` (`serie_id`);

--
-- Indices de la tabla `dependencias`
--
ALTER TABLE `dependencias`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indices de la tabla `permisos`
--
ALTER TABLE `permisos`
  ADD PRIMARY KEY (`id`),
  ADD KEY `permisos_user_id_foreign` (`user_id`);

--
-- Indices de la tabla `permissions`
--
ALTER TABLE `permissions`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `permissions_slug_unique` (`slug`);

--
-- Indices de la tabla `permission_role`
--
ALTER TABLE `permission_role`
  ADD PRIMARY KEY (`id`),
  ADD KEY `permission_role_permission_id_index` (`permission_id`),
  ADD KEY `permission_role_role_id_index` (`role_id`);

--
-- Indices de la tabla `permission_user`
--
ALTER TABLE `permission_user`
  ADD PRIMARY KEY (`id`),
  ADD KEY `permission_user_permission_id_index` (`permission_id`),
  ADD KEY `permission_user_user_id_index` (`user_id`);

--
-- Indices de la tabla `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `roles_name_unique` (`name`),
  ADD UNIQUE KEY `roles_slug_unique` (`slug`);

--
-- Indices de la tabla `role_user`
--
ALTER TABLE `role_user`
  ADD PRIMARY KEY (`id`),
  ADD KEY `role_user_role_id_index` (`role_id`),
  ADD KEY `role_user_user_id_index` (`user_id`);

--
-- Indices de la tabla `series`
--
ALTER TABLE `series`
  ADD PRIMARY KEY (`id`),
  ADD KEY `series_dependencias_id_foreign` (`dependencias_id`);

--
-- Indices de la tabla `stores`
--
ALTER TABLE `stores`
  ADD PRIMARY KEY (`id`),
  ADD KEY `stores_subserie_id_foreign` (`Subserie_id`);

--
-- Indices de la tabla `sub_series`
--
ALTER TABLE `sub_series`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sub_series_serie_id_foreign` (`serie_id`);

--
-- Indices de la tabla `timelines`
--
ALTER TABLE `timelines`
  ADD PRIMARY KEY (`id`),
  ADD KEY `timelines_users_id_foreign` (`users_id`);

--
-- Indices de la tabla `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `archivos`
--
ALTER TABLE `archivos`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `bitacora_dependencias`
--
ALTER TABLE `bitacora_dependencias`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `bitacora_series`
--
ALTER TABLE `bitacora_series`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `bitacora_sub_series`
--
ALTER TABLE `bitacora_sub_series`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `centrals`
--
ALTER TABLE `centrals`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `dependencias`
--
ALTER TABLE `dependencias`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=248;

--
-- AUTO_INCREMENT de la tabla `permisos`
--
ALTER TABLE `permisos`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `permissions`
--
ALTER TABLE `permissions`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `permission_role`
--
ALTER TABLE `permission_role`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `permission_user`
--
ALTER TABLE `permission_user`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `roles`
--
ALTER TABLE `roles`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `role_user`
--
ALTER TABLE `role_user`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `series`
--
ALTER TABLE `series`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `stores`
--
ALTER TABLE `stores`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `sub_series`
--
ALTER TABLE `sub_series`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `timelines`
--
ALTER TABLE `timelines`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `archivos`
--
ALTER TABLE `archivos`
  ADD CONSTRAINT `archivos_stores_id_foreign` FOREIGN KEY (`stores_id`) REFERENCES `stores` (`id`) ON DELETE CASCADE;

--
-- Filtros para la tabla `bitacora_dependencias`
--
ALTER TABLE `bitacora_dependencias`
  ADD CONSTRAINT `bitacora_dependencias_bitacoradependencias_id_foreign` FOREIGN KEY (`bitacoraDependencias_id`) REFERENCES `dependencias` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `bitacora_dependencias_users_id_foreign` FOREIGN KEY (`users_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Filtros para la tabla `bitacora_series`
--
ALTER TABLE `bitacora_series`
  ADD CONSTRAINT `bitacora_series_dependencias_id_foreign` FOREIGN KEY (`dependencias_id`) REFERENCES `dependencias` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `bitacora_series_serie_id_foreign` FOREIGN KEY (`serie_id`) REFERENCES `series` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `bitacora_series_users_id_foreign` FOREIGN KEY (`users_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Filtros para la tabla `bitacora_sub_series`
--
ALTER TABLE `bitacora_sub_series`
  ADD CONSTRAINT `bitacora_sub_series_serie_id_foreign` FOREIGN KEY (`serie_id`) REFERENCES `series` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `bitacora_sub_series_subserie_id_foreign` FOREIGN KEY (`Subserie_id`) REFERENCES `sub_series` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `bitacora_sub_series_users_id_foreign` FOREIGN KEY (`users_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Filtros para la tabla `centrals`
--
ALTER TABLE `centrals`
  ADD CONSTRAINT `centrals_serie_id_foreign` FOREIGN KEY (`serie_id`) REFERENCES `series` (`id`) ON DELETE CASCADE;

--
-- Filtros para la tabla `permisos`
--
ALTER TABLE `permisos`
  ADD CONSTRAINT `permisos_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Filtros para la tabla `permission_role`
--
ALTER TABLE `permission_role`
  ADD CONSTRAINT `permission_role_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `permission_role_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE;

--
-- Filtros para la tabla `permission_user`
--
ALTER TABLE `permission_user`
  ADD CONSTRAINT `permission_user_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `permission_user_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Filtros para la tabla `role_user`
--
ALTER TABLE `role_user`
  ADD CONSTRAINT `role_user_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `role_user_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Filtros para la tabla `series`
--
ALTER TABLE `series`
  ADD CONSTRAINT `series_dependencias_id_foreign` FOREIGN KEY (`dependencias_id`) REFERENCES `dependencias` (`id`) ON DELETE CASCADE;

--
-- Filtros para la tabla `stores`
--
ALTER TABLE `stores`
  ADD CONSTRAINT `stores_subserie_id_foreign` FOREIGN KEY (`Subserie_id`) REFERENCES `sub_series` (`id`) ON DELETE CASCADE;

--
-- Filtros para la tabla `sub_series`
--
ALTER TABLE `sub_series`
  ADD CONSTRAINT `sub_series_serie_id_foreign` FOREIGN KEY (`serie_id`) REFERENCES `series` (`id`) ON DELETE CASCADE;

--
-- Filtros para la tabla `timelines`
--
ALTER TABLE `timelines`
  ADD CONSTRAINT `timelines_users_id_foreign` FOREIGN KEY (`users_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
