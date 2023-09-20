def addtax(price):
    # 税率
    tax = 10

    intax = price *(tax / 100 + 1)
    return int(intax)