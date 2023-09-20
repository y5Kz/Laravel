def primenumber():

    yield 2 + 1
    yield '◆'
    yield 5
    yield 7

for i in primenumber():
    print(i)
