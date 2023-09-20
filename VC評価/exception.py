num = 'abc'

# if(num == 0):
#     print('0では割れません')
# else:
#     answer = 10 / num
#     print(answer)

try:
    answer = 10 / num
    print(answer)
except ZeroDivisionError:
    print('0では割れません')
except TypeError:
    print('数字で指定してください')
except:
    print('不明なエラーが発生しました')