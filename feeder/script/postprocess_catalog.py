#!/usr/bin/env python
# -*- coding: cp1251 -*-
##
# Arguments: 1 - input, 2 - output
##
import csv
import sys

category_map = {
    '���� � ����': "wfurs",
    "������� ���������": "woman",
    "���� �� �����": "wmink",
    "�����": "wumbrellas",
    "����������": "waccessories",
    "������": "wclothes",
    "������": "wtopjacket",
    "������� ���������": "man",
    "������": "mclothes",
    "������": "wtopcoat",
    "��������": "mpaddedcoat",
    "��������": "wskincoat",
    "������� ������": "wleathertopjacket",
    "�������": "new",
    "������": "wdress",
    "���� �� ����": "wlynx",
    "�������� ���������": "home_accessories",
    "�����": "mbags",
    "�����": "mbelts",
    "����������": "maccessories",
    "�������� �����": "mhats",
    "������/�����": "wshawls",
    "�������� �����": "whats",
    "������": "mclothes_sale",
    "������� ������": "mtopclothes_sale",
    "������": "mtopcoat_sale",
    "������� ������ �� ����": "mleather_sale",
    "��������": "mskincoat_sale",
    "������": "wclothes_sale",
    "������� ������": "wtopclothes_sale",
    "������": "wtopcoat_sale",
    "������� ������ �� ����": "wleather_sale",
    "��������": "wskincoat_sale",
    "������ ������ �������": "mwleathertopjacket",
    "��������": "mskincoat",
    "������� ������ � ����������": "muzhskie_plavki_shorti",
    "�����": "mshorts",
    "����� ��� IPad": "wipad",
    "����": "wglasses",
    "��������": "wwallets",
    "���������": "wbijouteries",
    "�����": "wboots",
    "������� ������ � ����������": "zhenskie_kupalniki",
    "����� � �����������": "wshorts",
    "�����": "wtopcloak",
    "�������� �����������": "wfurs_bestsell",
    "����������": "maccessories_sale",
    "����������": "waccessories_sale",
    "������� ���������": "man_sale",
    "������� ���������": "woman_sale",
    "����������": "sale",
    "���� �� �������": "wrabbit",
    "������� ������": "wfurvest",
    "����� � ������": "mpants",
    "������� ������ � �����": "wleathertopcoat",
    "����� � ������": "wpants",
    "������ � �������": "wblouse",
    "��������� � ��������": "wcardigan",
    "������ � ������": "wjacket",
    "������": "mtopjacket",
    "������� ������ ������": "wwleathertopjacket",
    "��������": "wgloves",
    "�������� � ����": "wtshort",
    "��������": "mtshort",
    "�������": "mshirt",
    "����": "wskirt",
    "��������� � ��������": "mtrico",
    "������� ������": "mleathertopjacket",
    "��������": "wpaddedcoat",
    "���� �� ����": "wfox",
    "���� �� ��������": "wkarakul",
    "������ ���": "wfurother",
    "�����": "wbelts",
    "�����": "wbags",
    "������": "mtopcoat",
    "�����": "mshawls",
    "�����": "mtopcloak",
    "������": "wtunic",
    "������� ": "mblazer",
    "��������": "mwindbreaker",
    "��������": "wtrico",
    "��������": "wwindbreaker",
    "��������": "mgloves",
    "��������": "mwallets",
    "�����": "mumbrellas"}
with open(sys.argv[1]) as csvfile:
    reader = csv.DictReader(csvfile, delimiter=";")
    with open(sys.argv[2], "w") as csv_out:
        writer = csv.DictWriter(csv_out, quoting=csv.QUOTE_NONNUMERIC, fieldnames=["IE_XML_ID", "IE_NAME", "IP_PROP9", "IE_ACTIVE", "IP_PROP3", "IMAGE_URL", "URL"], extrasaction="ignore", delimiter=";")
        writer.writeheader()
        for row in reader:
            if row["IC_GROUP1"] != "" and row["IC_GROUP2"] != "":
                d = row
                d["IE_NAME"] = "{0} ({1:.0f}�.)".format(d["IE_NAME"], float(d["IP_PROP3"]))
                d["IMAGE_URL"] = "http://snowqueen.ru{0}".format(d["IE_PREVIEW_PICTURE"])
                d["URL"] = "http://snowqueen.ru/collection/{0}/{1}/".format(category_map[row["IC_GROUP2"]], row["IE_ID"])
                writer.writerow(d)
