def items():
    names = ['いちご', 'りんご', 'もも']
    for i in names:
        yield '◇' + i

for x in items():
    print(x)