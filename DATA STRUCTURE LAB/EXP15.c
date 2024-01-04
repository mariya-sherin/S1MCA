#include<stdio.h>
#include<stdlib.h>

struct node {
    int data;
    struct node *next;
};

struct node *head = NULL, *ptr;

void enqueue(int item) {
    struct node *temp;
    temp = malloc(sizeof(struct node));
    
    if (temp == NULL) {
        printf("Memory not allocated...");
    } else {
        temp->data = item;
        temp->next = NULL;
    }
    
    if (head == NULL) {
        head = temp;
    } else {
        ptr = head;
        while (ptr->next != NULL) {
            ptr = ptr->next;
        }
        ptr->next = temp;
    }
    printf("%d inserted\n", item);
}

void dequeue() {
    if (head == NULL) {
        printf("\nQueue is empty...");
    } else {
        ptr = head;
        head = head->next;
        printf("%d is deleted\n", ptr->data);
        free(ptr);
    }
}

void traversal() {
    if (head == NULL) {
        printf("Queue is empty...");
    } else {
        ptr = head;
        printf("\nThe present Queue is : ");
        while (ptr != NULL) {
            printf("%d \t", ptr->data);
            ptr = ptr->next;
        }
        printf("\n");
    }
}

int main() {
    int item, ch;
    printf("The operations available:\n1.Enqueue:\n2.Dequeue:\n3.Traversal\n4.Exit\n");
    
    do {
        printf("\nEnter any option:");
        scanf("%d", &ch);
        
        switch (ch) {
            case 1:
                printf("Enter the element to be added:");
                scanf("%d", &item);
                enqueue(item);
                traversal();
                break;
                
            case 2:
                dequeue();
                traversal();
                break;
                
            case 3:
                traversal();
                break;
                
            case 4:
                printf("Exiting program. Goodbye!\n");
                break;
                
            default:
                printf("Invalid choice!\n");
        }
    } while (ch != 4);
    return 0;
}
