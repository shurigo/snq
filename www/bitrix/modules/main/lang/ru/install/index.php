<?
$MESS ['MAIN_ADMIN_GROUP_NAME'] = "��������������";
$MESS ['MAIN_ADMIN_GROUP_DESC'] = "������ ������ � ���������� ������.";
$MESS ['MAIN_EVERYONE_GROUP_NAME'] = "��� ������������ (� ��� ����� ����������������)";
$MESS ['MAIN_EVERYONE_GROUP_DESC'] = "��� ������������, ������� ����������������.";
$MESS ['MAIN_DEFAULT_SITE_NAME'] = "���� �� ���������";
$MESS ['MAIN_DEFAULT_LANGUAGE_NAME'] = "Russian";
$MESS ['MAIN_DEFAULT_LANGUAGE_FORMAT_DATE'] = "DD.MM.YYYY";
$MESS ['MAIN_DEFAULT_LANGUAGE_FORMAT_DATETIME'] = "DD.MM.YYYY HH:MI:SS";
$MESS ['MAIN_DEFAULT_LANGUAGE_FORMAT_CHARSET'] = "windows-1251";
$MESS ['MAIN_DEFAULT_SITE_FORMAT_DATE'] = "DD.MM.YYYY";
$MESS ['MAIN_DEFAULT_SITE_FORMAT_DATETIME'] = "DD.MM.YYYY HH:MI:SS";
$MESS ['MAIN_DEFAULT_SITE_FORMAT_CHARSET'] = "windows-1251";
$MESS ['MAIN_MODULE_NAME'] = "������� ������";
$MESS ['MAIN_MODULE_DESC'] = "���� �������";
$MESS ['MAIN_INSTALL_DB_ERROR'] = "�� ���� ����������� � ����� ������. ��������� ������������ ��������� ����������";
$MESS ['MAIN_NEW_USER_TYPE_NAME'] = "����������������� ����� ������������";
$MESS ['MAIN_NEW_USER_TYPE_DESC'] = "

#USER_ID# - ID ������������
#LOGIN# - �����
#EMAIL# - EMail
#NAME# - ���
#LAST_NAME# - �������
#USER_IP# - IP ������������
#USER_HOST# - ���� ������������
";
$MESS ['MAIN_USER_INFO_TYPE_NAME'] = "���������� � ������������";
$MESS ['MAIN_USER_INFO_TYPE_DESC'] = "

#USER_ID# - ID ������������
#STATUS# - ������ ������
#MESSAGE# - ��������� ������������
#LOGIN# - �����
#CHECKWORD# - ����������� ������ ��� ����� ������
#NAME# - ���
#LAST_NAME# - �������
#EMAIL# - E-Mail ������������
";
$MESS ['MAIN_NEW_USER_CONFIRM_TYPE_NAME'] = "������������� ����������� ������ ������������";
$MESS ['MAIN_NEW_USER_CONFIRM_TYPE_DESC'] = "


#USER_ID# - ID ������������
#LOGIN# - �����
#EMAIL# - EMail
#NAME# - ���
#LAST_NAME# - �������
#USER_IP# - IP ������������
#USER_HOST# - ���� ������������
#CONFIRM_CODE# - ��� �������������
";
$MESS ['MAIN_USER_INVITE_TYPE_NAME'] = "����������� �� ���� ������ ������������";
$MESS ['MAIN_USER_INVITE_TYPE_DESC'] = "#ID# - ID ������������
#LOGIN# - �����
#URL_LOGIN# - �����, �������������� ��� ������������� � URL
#EMAIL# - EMail
#NAME# - ���
#LAST_NAME# - �������
#PASSWORD# - ������ ������������ 
#CHECKWORD# - ����������� ������ ��� ����� ������
#XML_ID# - ID ������������ ��� ����� � �������� �����������
";
$MESS ['MAIN_NEW_USER_EVENT_NAME'] = "#SITE_NAME#: ����������������� ����� ������������";
$MESS ['MAIN_NEW_USER_EVENT_DESC'] = "�������������� ��������� ����� #SITE_NAME#
------------------------------------------

�� ����� #SERVER_NAME# ������� ��������������� ����� ������������.

������ ������������:
ID ������������: #USER_ID#

���: #NAME#
�������: #LAST_NAME#
E-Mail: #EMAIL#

Login: #LOGIN#

������ ������������� �������������.";
$MESS ['MAIN_USER_INFO_EVENT_NAME'] = "#SITE_NAME#: ��������������� ����������";
$MESS ['MAIN_USER_INFO_EVENT_DESC'] = "�������������� ��������� ����� #SITE_NAME#
------------------------------------------
#NAME# #LAST_NAME#,

#MESSAGE#

���� ��������������� ����������:

ID ������������: #USER_ID#
������ �������: #STATUS#
Login: #LOGIN#

��� ����� ������ ��������� �� ��������� ������:
http://#SERVER_NAME#/bitrix/admin/index.php?change_password=yes&lang=ru&USER_CHECKWORD=#CHECKWORD#

��������� ������������� �������������.";
$MESS ['MAIN_NEW_USER_CONFIRM_EVENT_NAME'] = "#SITE_NAME#: ������������� ����������� ������ ������������";
$MESS ['MAIN_NEW_USER_CONFIRM_EVENT_DESC'] = "�������������� ��������� ����� #SITE_NAME#
------------------------------------------

������������,

�� �������� ��� ���������, ��� ��� ��� ����� ��� ����������� ��� ����������� ������ ������������ �� ������� #SERVER_NAME#.

��� ��� ��� ������������� �����������: #CONFIRM_CODE#

��� ������������� ����������� ��������� �� ��������� ������:
http://#SERVER_NAME#/auth/index.php?confirm_registration=yes&confirm_user_id=#USER_ID#&confirm_code=#CONFIRM_CODE#

�� ����� ������ ������ ��� ��� ������������� ����������� �� ��������:
http://#SERVER_NAME#/auth/index.php?confirm_registration=yes&confirm_user_id=#USER_ID#

��������! ��� ������ �� ����� ��������, ���� �� �� ����������� ���� �����������.

---------------------------------------------------------------------

��������� ������������� �������������.";
$MESS ['MAIN_USER_INVITE_EVENT_NAME'] = "#SITE_NAME#: ����������� �� ����";
$MESS ['MAIN_USER_INVITE_EVENT_DESC'] = "�������������� ��������� ����� #SITE_NAME#
------------------------------------------
������������, #NAME# #LAST_NAME#!

��������������� ����� �� ��������� � ����� ������������������ �������������.

���������� ��� �� ��� ����.

���� ��������������� ����������:

ID ������������: #ID#
Login: #LOGIN#

����������� ��� ������� ������������� ������������� ������.

��� ����� ������ ��������� �� ��������� ������:
http://#SERVER_NAME#/auth.php?change_password=yes&USER_LOGIN=#URL_LOGIN#&USER_CHECKWORD=#CHECKWORD#
";
$MESS ['MF_EVENT_NAME'] = "�������� ��������� ����� ����� �������� �����";
$MESS ['MF_EVENT_DESCRIPTION'] = "#AUTHOR# - ����� ���������
#AUTHOR_EMAIL# - Email ������ ���������
#TEXT# - ����� ���������
#EMAIL_FROM# - Email ����������� ������
#EMAIL_TO# - Email ���������� ������";
$MESS ['MF_EVENT_SUBJECT'] = "#SITE_NAME#: ��������� �� ����� �������� �����";
$MESS ['MF_EVENT_MESSAGE'] = "�������������� ��������� ����� #SITE_NAME#
------------------------------------------

��� ���� ���������� ��������� ����� ����� �������� �����

�����: #AUTHOR#
E-mail ������: #AUTHOR_EMAIL#

����� ���������:
#TEXT#

��������� ������������� �������������.";
?>