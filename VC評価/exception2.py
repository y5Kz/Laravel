def calc(a, b):
    if (b == 1):
        raise ZeroDivisionError('division by one')
    return a / b

try:
    # ans = calc(5, 0)
    print(calc(5, 2))
except:
    print('error')