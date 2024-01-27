#include <stdio.h>
#include <stdlib.h>

struct DisjointSet {
    int *r, *p, n;
} s;

void makeSet(struct DisjointSet *s, int n) {
    s->r = (int*)malloc(n * sizeof(int));
    s->p = (int*)malloc(n * sizeof(int));
    s->n = n;
    for (int i = 0; i < n; i++) {
        s->p[i] = i;
    }
}

int find(struct DisjointSet *s, int x) {
    if (s->p[x] != x) {
        s->p[x] = find(s, s->p[x]);
    }
    return s->p[x];
}

void Union(struct DisjointSet *s, int x, int y) {
    int a = find(s, x);
    int b = find(s, y);
    if (a == b)
        return;
    if (s->r[a] < s->r[b]) {
        s->p[a] = b;
    } else if (s->r[a] > s->r[b]) {
        s->p[b] = a;
    } else {
        s->p[b] = a;
        s->r[a] = s->r[a] + 1;
    }
}

int main() {
    int n, ch, x, y;
    printf("Enter the number of elements: ");
    scanf("%d", &n);
    makeSet(&s, n);

    do {
        printf("\n1. Union\n2. Find\n3. Quit\n");
        printf("Enter your choice: ");
        scanf("%d", &ch);

        switch (ch) {
            case 1:
                printf("Enter the elements : ");
                scanf("%d %d", &x, &y);
                Union(&s, x, y);
                break;
            case 2:
                printf("Enter element to find: ");
                scanf("%d", &x);
                printf("Set representative for element %d: %d\n", x, find(&s, x));
                break;
        }
    } while (ch > 0 && ch < 3);

    free(s.r);
    free(s.p);

    return 0;
}
