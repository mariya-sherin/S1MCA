class Time:
    def __init__(self, h, m, s):
        self.h = h
        self.m = m
        self.s = s

    def display(self):
        print(self.h, "hr", self.m, "min", self.s, "sec")

    def __add__(self, t):
        res = Time(0, 0, 0)
        res.h = self.h + t.h
        res.m = self.m + t.m
        res.s = self.s + t.s

        res.m = res.m + res.s // 60
        res.s = res.s % 60
        res.h = res.h + res.m // 60
        res.m = res.m % 60

        return res

h1, m1, s1 = map(int, input("Enter Time 1 (H:M:S): ").split())
h2, m2, s2 = map(int, input("Enter Time 2 (H:M:S): ").split())

t1 = Time(h1, m1, s1)
t2 = Time(h2, m2, s2)
t3 = t1 + t2

print("Time 1: ", end="")
t1.display()
print("Time 2: ", end="")
t2.display()
print("Time 3: ", end="")
t3.display()
