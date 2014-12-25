#!/usr/bin/env python
# -*- coding: cp1251 -*-
##
# Arguments: 1 - input, 2 - output
##
import csv
import sys

category_map = {
    'Шубы и меха': "wfurs",
    "Женская коллекция": "woman",
    "Шубы из норки": "wmink",
    "Зонты": "wumbrellas",
    "Аксессуары": "waccessories",
    "Одежда": "wclothes",
    "Куртки": "wtopjacket",
    "Мужская коллекция": "man",
    "Одежда": "mclothes",
    "Пальто": "wtopcoat",
    "Пуховики": "mpaddedcoat",
    "Дубленки": "wskincoat",
    "Кожаные куртки": "wleathertopjacket",
    "Новинки": "new",
    "Платья": "wdress",
    "Шубы из рыси": "wlynx",
    "Предметы интерьера": "home_accessories",
    "Сумки": "mbags",
    "Ремни": "mbelts",
    "Аксессуары": "maccessories",
    "Головные уборы": "mhats",
    "Платки/Шарфы": "wshawls",
    "Головные уборы": "whats",
    "Одежда": "mclothes_sale",
    "Верхняя одежда": "mtopclothes_sale",
    "Пальто": "mtopcoat_sale",
    "Верхняя одежда из кожи": "mleather_sale",
    "Дубленки": "mskincoat_sale",
    "Одежда": "wclothes_sale",
    "Верхняя одежда": "wtopclothes_sale",
    "Пальто": "wtopcoat_sale",
    "Верхняя одежда из кожи": "wleather_sale",
    "Дубленки": "wskincoat_sale",
    "Куртки зимние кожаные": "mwleathertopjacket",
    "Дубленки": "mskincoat",
    "Пляжная одежда и купальники": "muzhskie_plavki_shorti",
    "Шорты": "mshorts",
    "Чехлы для IPad": "wipad",
    "Очки": "wglasses",
    "Кошельки": "wwallets",
    "Бижутерия": "wbijouteries",
    "Обувь": "wboots",
    "Пляжная одежда и купальники": "zhenskie_kupalniki",
    "Шорты и комбинезоны": "wshorts",
    "Плащи": "wtopcloak",
    "Выгодное предложение": "wfurs_bestsell",
    "Аксессуары": "maccessories_sale",
    "Аксессуары": "waccessories_sale",
    "Мужская коллекция": "man_sale",
    "Женская коллекция": "woman_sale",
    "Распродажа": "sale",
    "Шубы из кролика": "wrabbit",
    "Меховые жилеты": "wfurvest",
    "Брюки и джинсы": "mpants",
    "Кожаные пальто и плащи": "wleathertopcoat",
    "Брюки и джинсы": "wpants",
    "Блузки и рубашки": "wblouse",
    "Кардиганы и джемперы": "wcardigan",
    "Жакеты и жилеты": "wjacket",
    "Куртки": "mtopjacket",
    "Кожаные куртки зимние": "wwleathertopjacket",
    "Перчатки": "wgloves",
    "Футболки и топы": "wtshort",
    "Футболки": "mtshort",
    "Рубашки": "mshirt",
    "Юбки": "wskirt",
    "Кардиганы и джемперы": "mtrico",
    "Кожаные куртки": "mleathertopjacket",
    "Пуховики": "wpaddedcoat",
    "Шубы из лисы": "wfox",
    "Шубы из каракуля": "wkarakul",
    "Другой мех": "wfurother",
    "Ремни": "wbelts",
    "Сумки": "wbags",
    "Пальто": "mtopcoat",
    "Шарфы": "mshawls",
    "Плащи": "mtopcloak",
    "Туники": "wtunic",
    "Пиджаки ": "mblazer",
    "Ветровки": "mwindbreaker",
    "Трикотаж": "wtrico",
    "Ветровки": "wwindbreaker",
    "Перчатки": "mgloves",
    "Кошельки": "mwallets",
    "Зонты": "mumbrellas"}
with open(sys.argv[1]) as csvfile:
    reader = csv.DictReader(csvfile, delimiter=";")
    with open(sys.argv[2], "w") as csv_out:
        writer = csv.DictWriter(csv_out, quoting=csv.QUOTE_NONNUMERIC, fieldnames=["IE_XML_ID", "IE_NAME", "IP_PROP9", "IE_ACTIVE", "IP_PROP3", "IMAGE_URL", "URL"], extrasaction="ignore", delimiter=";")
        writer.writeheader()
        for row in reader:
            if row["IC_GROUP1"] != "" and row["IC_GROUP2"] != "":
                d = row
                d["IE_NAME"] = "{0} ({1:.0f}р.)".format(d["IE_NAME"], float(d["IP_PROP3"]))
                d["IMAGE_URL"] = "http://snowqueen.ru{0}".format(d["IE_PREVIEW_PICTURE"])
                d["URL"] = "http://snowqueen.ru/collection/{0}/{1}/".format(category_map[row["IC_GROUP2"]], row["IE_ID"])
                writer.writerow(d)
