#!/usr/bin/env python
# -*- coding: cp1251 -*-
##
# Arguments: 1 - input, 2 - output
##
import csv
import sys

category_map = {
    "���� � ����":("wfurs",129,284),
    "��������":("wskincoat",136,284),
    "��������":("wpaddedcoat",142,284),
    "����������":("waccessories",285,284),
    "������":("wtopjacket",296,284),
    "������":("wtopcoat",297,284),
    "������ � �������":("wblouse",300,284),
    "����� � ������":("wpants",301,284),
    "������ � ������":("wjacket",302,284),
    "������":("wdress",303,284),
    "����":("wskirt",305,284),
    "������� ������":("wleathertopjacket",316,284),
    "������� ������ � �����":("wleathertopcoat",317,284),
    "������":("wtunic",475,284),
    "��������� � ��������":("wcardigan",476,284),
    "�������� � ����":("wtshort",477,284),
    "������� ������ ������":("wwleathertopjacket",493,284),
    "������":("wclothes",299,284),
    "��������":("wtrico",304,284),
    "�����":("wtopcloak",326,284),
    "��������":("wwindbreaker",328,284),
    "����� � �����������":("wshorts",478,284),
    "������� ������ � ����������":("zhenskie_kupalniki",490,284),
    "��������":("mskincoat",156,306),
    "��������":("mpaddedcoat",160,306),
    "����������":("maccessories",307,306),
    "������":("mtopjacket",310,306),
    "������":("mtopcoat",311,306),
    "����� � ������":("mpants",313,306),
    "�������":("mshirt",314,306),
    "��������� � ��������":("mtrico",315,306),
    "������� ������":("mleathertopjacket",318,306),
    "�����":("mtopcloak",327,306),
    "��������":("mtshort",417,306),
    "������� ":("mblazer",480,306),
    "������ ������ �������":("mwleathertopjacket",483,306),
    "������":("mclothes",312,306),
    "��������":("mwindbreaker",329,306),
    "�����":("mshorts",418,306),
    "������� ������ � ����������":("muzhskie_plavki_shorti",491,306),
    "�������� �����������":("wfurs_bestsell",494,495),
    "������� ���������":("woman_sale",496,495),
    "������� ���������":("man_sale",497,495)}
#
#    "������� ���������":(284,284,"collection"),
#    "������� ���������":(306,306,"collection"),
#    "�������� ���������":("home_accessories",492,"collection"),
#    "����������":(495,495,"collection"),
#    "�������":("new",511,"collection")}

with open(sys.argv[1]) as csvfile:
    reader = csv.DictReader(csvfile, delimiter=";")
    with open(sys.argv[2], "w") as csv_out:
        writer = csv.DictWriter(csv_out, quoting=csv.QUOTE_NONNUMERIC, fieldnames=["IE_XML_ID", "IE_NAME", "IP_PROP9", "IE_ACTIVE", "IP_PROP3", "IMAGE_URL", "URL", "ALLCAT", "LEAFCAT"], extrasaction="ignore", delimiter=";")
        writer.writeheader()
        for row in reader:
            if row["IC_GROUP1"] != "" and row["IC_GROUP2"] != "":
                d = row
                d["IE_NAME"] = "{0}, {1:.0f}�.".format(d["IE_NAME"], float(d["IP_PROP3"]))
                d["IMAGE_URL"] = "http://snowqueen.ru{0}".format(d["IE_PREVIEW_PICTURE"])
                category = category_map[row["IC_GROUP2"]]
                d["URL"] = "http://snowqueen.ru/collection/{0}/{1}/".format(category[0], row["IE_ID"])
                d["ALLCAT"] = "|".join(map(str, [category[2], category[1]]))
                d["LEAFCAT"] = str(category[1])
                writer.writerow(d)
