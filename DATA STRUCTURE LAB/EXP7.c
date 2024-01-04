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
void display_array() {
    printf("Sorted array: ");
    for (int i = 0; i < n; i++) {
        printf("%d ", a[i]);
    }
    printf("\n");
}
void main() {
    int ch, x, p;
    printf("Enter the size of the array : ");
    scanf("%d", &n);
    printf("Enter array : ");
    for (int i = 0; i < n; i++) {
        scanf("%d", &a[i]);
    }

    do {
        printf("1. Sort\n2. Linear Search\n3. Binary Search\n4. Exit\nEnter your choice (1-4) : ");
        scanf("%d", &ch);
        switch (ch) {
            case 1:
                bubble_sort();
                display_array();
                printf("Array sorted successfully.\n");
                break;
            case 2:
                printf("Enter the element to be searched : ");
                scanf("%d", &x);
                p = l_search(x);
                if (p == -1) {
                    printf("Element not found\n");
                } else {
                    printf("Element found at position %d\n", p + 1);
                }
                break;
            case 3:
                printf("Enter the element to be searched : ");
                scanf("%d", &x);
                p = b_search(x);
                if (p == -1) {
                    printf("Element not found\n");
                } else {
                    printf("Element found at position %d\n", p + 1);
                }
                break;
            case 4:
                printf("Exiting the program. Thank you!\n");
                break;
            default:
                printf("Invalid choice. Please enter a number between 1 and 4.\n");
        }
    } while (ch != 4);
}
