#include <stdio.h>
#include <stdlib.h>

const int inf = 99999;
int k, a, b, u, v, n, ne = 1, mincost = 0, parent[9] = {0}, adj[50][50], i = 0, j = 0;

int find(int i) {
    while (parent[i] != 0)
        i = parent[i];
    return i;
}

int union(int i, int j) {
    if (i != j) {
        parent[j] = i;
        return 1;
    }
    return 0;
}

void kruskals() {
    while (ne < n) {
        int min = inf;
        for (i = 0; i < n; i++) {
            for (j = 0; j < n; j++) {
                if (adj[i][j] < min) {
                    min = adj[i][j];
                    a = u = i;
                    b = v = j;
                }
            }
        }
        u = find(u);
        v = find(v);
        if (union(u, v) != 0) {
            printf("Edge between vertex %d and vertex %d has cost %d\n", a, b, min);
            mincost += min;
        }
        adj[a][b] = adj[b][a] = 99999;
        ne++;
    }
    printf("Minimum cost = %d\n", mincost);
}

int main() {
    printf("Enter the number of vertices : ");
    scanf("%d", &n);
    printf("Enter the cost matrix: ");
    for (i = 0; i < n; i++) {
        for (j = 0; j < n; j++) {
            scanf("%d", &adj[i][j]);
            if (adj[i][j] == 0) {
                adj[i][j] = inf;
            }
        }
    }
    printf("Edges and their Costs:\n");

    kruskals();

    return 0;
}