
# mcc_menu
INSERT INTO `mcc_manage`.`mcc_menu` (`id`, `parentid`, `name`, `url`, `icons`, `sorts`, `created_at`, `updated_at`) VALUES ('1', '0', '首页', 'manage', 'fa fa-home', '100', NULL, NULL);
INSERT INTO `mcc_manage`.`mcc_menu` (`id`, `parentid`, `name`, `url`, `icons`, `sorts`, `created_at`, `updated_at`) VALUES ('2', '0', '用户管理', 'manage/user', 'fa fa-users', '0', NULL, NULL);
INSERT INTO `mcc_manage`.`mcc_menu` (`id`, `parentid`, `name`, `url`, `icons`, `sorts`, `created_at`, `updated_at`) VALUES ('4', '0', '系统管理', 'manage/system', 'glyphicon glyphicon-cog', '0', NULL, NULL);
INSERT INTO `mcc_manage`.`mcc_menu` (`id`, `parentid`, `name`, `url`, `icons`, `sorts`, `created_at`, `updated_at`) VALUES ('5', '2', '用户列表', 'manage/user/list', '', '0', NULL, NULL);

# mcc_user