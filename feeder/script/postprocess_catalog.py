#!/usr/bin/env python
# -*- coding: cp1251 -*-
##
# Arguments: 1 - input, 2 - output
##
import csv
import sys

category_map = {
    "Шубы и меха":("wfurs",129,284),
    "Дубленки":("wskincoat",136,284),
    "Пуховики":("wpaddedcoat",142,284),
    "Аксессуары":("waccessories",285,284),
    "Куртки":("wtopjacket",296,284),
    "Пальто":("wtopcoat",297,284),
    "Блузки и рубашки":("wblouse",300,284),
    "Брюки и джинсы":("wpants",301,284),
    "Жакеты и жилеты":("wjacket",302,284),
    "Платья":("wdress",303,284),
    "Юбки":("wskirt",305,284),
    "Кожаные куртки":("wleathertopjacket",316,284),
    "Кожаные пальто и плащи":("wleathertopcoat",317,284),
    "Туники":("wtunic",475,284),
    "Кардиганы и джемперы":("wcardigan",476,284),
    "Футболки и топы":("wtshort",477,284),
    "Кожаные куртки зимние":("wwleathertopjacket",493,284),
    "Одежда":("wclothes",299,284),
    "Трикотаж":("wtrico",304,284),
    "Плащи":("wtopcloak",326,284),
    "Ветровки":("wwindbreaker",328,284),
    "Шорты и комбинезоны":("wshorts",478,284),
    "Пляжная одежда и купальники":("zhenskie_kupalniki",490,284),
    "Дубленки":("mskincoat",156,306),
    "Пуховики":("mpaddedcoat",160,306),
    "Аксессуары":("maccessories",307,306),
    "Куртки":("mtopjacket",310,306),
    "Пальто":("mtopcoat",311,306),
    "Брюки и джинсы":("mpants",313,306),
    "Рубашки":("mshirt",314,306),
    "Кардиганы и джемперы":("mtrico",315,306),
    "Кожаные куртки":("mleathertopjacket",318,306),
    "Плащи":("mtopcloak",327,306),
    "Футболки":("mtshort",417,306),
    "Пиджаки ":("mblazer",480,306),
    "Куртки зимние кожаные":("mwleathertopjacket",483,306),
    "Одежда":("mclothes",312,306),
    "Ветровки":("mwindbreaker",329,306),
    "Шорты":("mshorts",418,306),
    "Пляжная одежда и купальники":("muzhskie_plavki_shorti",491,306),
    "Выгодное предложение":("wfurs_bestsell",494,495),
    "Женская коллекция":("woman_sale",496,495),
    "Мужская коллекция":("man_sale",497,495)}
#
#    "Женская коллекция":(284,284,"collection"),
#    "Мужская коллекция":(306,306,"collection"),
#    "Предметы интерьера":("home_accessories",492,"collection"),
#    "Распродажа":(495,495,"collection"),
#    "Новинки":("new",511,"collection")}

with open(sys.argv[1]) as csvfile:
    reader = csv.DictReader(csvfile, delimiter=";")
    with open(sys.argv[2], "w") as csv_out:
        writer = csv.DictWriter(csv_out, quoting=csv.QUOTE_NONNUMERIC, fieldnames=["IE_XML_ID", "IE_NAME", "IP_PROP9", "IE_ACTIVE", "IP_PROP3", "IMAGE_URL", "URL", "ALLCAT", "LEAFCAT"], extrasaction="ignore", delimiter=";")
        writer.writeheader()
        for row in reader:
            if row["IC_GROUP1"] != "" and row["IC_GROUP2"] != "":
                d = row
                d["IE_NAME"] = "{0}, {1:.0f}р.".format(d["IE_NAME"], float(d["IP_PROP3"]))
                d["IMAGE_URL"] = "http://snowqueen.ru{0}".format(d["IE_PREVIEW_PICTURE"])
                category = category_map[row["IC_GROUP2"]]
                d["URL"] = "http://snowqueen.ru/collection/{0}/{1}/".format(category[0], row["IE_ID"])
                d["ALLCAT"] = "|".join(map(str, [category[2], category[1]]))
                d["LEAFCAT"] = str(category[1])
                writer.writerow(d)
