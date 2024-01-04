#include <stdio.h>
#define MAX 5

void enqueue();
void dequeue();
void display();

int queue[MAX], front = -1, rear = -1;

void enqueue() {
    int item;
    if (rear == MAX - 1) {
        printf("\nQUEUE OVERFLOW");
    } else {
        if (front == -1)
            front = 0;
        printf("\nEnter the element to insert : ");
        scanf("%d", &item);
        rear++;
        queue[rear] = item;
    }
}
void dequeue() {
    if (front == -1) {
        printf("\nQUEUE UNDERFLOW");
    } else {
        printf("\nThe deleted element is:%d\n", queue[front]);
        if (front == rear) {
            front = rear = -1;
        } else {
            front++;
        }
    }
}

void display() {
    if (front == -1) {
        printf("\nQUEUE UNDERFLOW\n");
    } else {
        printf("\n\n");
        for (int i = front; i <= rear; i++) {
            printf(" %d ", queue[i]);
        }
        printf("\n\n");
    }
}

int main() {
    int c;

    do {
        printf("\n1) Insertion\n2) Deletion\n3) Display\n4) Exit\n");
        printf("Enter your choice: ");
        scanf("%d", &c);

        switch (c) {
            case 1:
                enqueue();
                break;
            case 2:
                dequeue();
                break;
            case 3:
                display();
                break;
            case 4:
                printf("\nYou have exited from the program.\n");
                break;
            default:
                printf("\nEnter a valid choice (1 to 4)\n");
        }
    } while (c != 4);

    return 0;
}
