scores = [89, 70] #リスト

# appendができない
# scores = (89, 70) #タプル

# 重複した値をなくしてしまう
# scores = {89, 70, 70} #セット

scores = {'山田': 89, '佐藤': 70, '谷口': 70}

print(scores['谷口'])




# scores.append(50)

#scoresの[]番目の数字を出す
# print(scores[0])

sum = 0
for name in scores.keys():

    sum += scores[name]

print(sum / len(scores))