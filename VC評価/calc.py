num1 = int(input('１つ目の数は？'))

num2 = int(input('２つ目の数は？'))

#足し算をする
answer = num1 + num2
print(answer)

#偶数か奇数かを判断する
if(answer % 2 ==1):
    print('奇数です')
else:
    print('偶数です')