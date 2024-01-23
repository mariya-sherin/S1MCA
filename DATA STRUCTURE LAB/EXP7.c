#include <stdio.h>
int a[50], n;
int l_search(int x) {
    for (int i = 0; i < n; i++) {
        if (x == a[i]) {
            return i;
        }
    }
    return -1;
}

int b_search(int x) {
    int b = 0, l = n - 1, m;
    while (b <= l) {
        m = (b + l) / 2;
        if (x == a[m])
            return m;
        else if (x > a[m])
            b = m + 1;
        else
            l = m - 1;
    }
    return -1;
}
void bubble_sort() {
    for (int i = 0; i < n - 1; i++) {
        for (int j = 0; j < n - i - 1; j++) {
            if (a[j] > a[j + 1]) {
                int temp = a[j];
                a[j] = a[j + 1];
                a[j + 1] = temp;
            }
        }
    }
}
int main() {
    int ch, x, p;
    
    printf("Enter the size of the array: ");
    scanf("%d", &n);

    printf("Enter array: ");
    for (int i = 0; i < n; i++) {
        scanf("%d", &a[i]);
    }

    bubble_sort();

    do {
        printf("Select the searching method:\n1. Linear Search\n2. Binary Search\n3. Exit\nEnter your choice (1-3): ");
        if (scanf("%d", &ch) != 1) {
            printf("Invalid input. Please enter a number.\n");
            while (getchar() != '\n');
            continue;
        }

        switch (ch) {
            case 1:
                printf("Enter the element to be searched: ");
                scanf("%d", &x);
                p = l_search(x);
                break;
            case 2:
                printf("Enter the element to be searched: ");
                scanf("%d", &x);
                p = b_search(x);
                break;
            case 3:
                break;
            default:
                printf("Invalid choice\n");
                continue;
        }

        if (p == -1) {
            printf("Element not found\n");
        } else {
            printf("Element found at position %d\n", p + 1);
        }
    } while (ch != 3);

    return 0;
}
