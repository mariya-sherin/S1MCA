/* Linked Stack */


#include<stdio.h>
#include<stdlib.h>
struct node{
    int item;
    struct node *next;
};
struct node *head=NULL, *ptr;

void create()
{
    struct node *temp=NULL;
    temp=malloc(sizeof(struct node));
    printf("Node created sucessfully");
}
void push(int item)
{
    struct node *temp=NULL;
    temp=malloc(sizeof(struct node));
    if(temp==NULL)
    {
        printf("No memory allocated...");
    }
    else
    {
        temp->item=item;
        temp->next=NULL;
    }
    if(head==NULL)
    {
        head=temp;
    }
    else
    {
        ptr=head;
        while(ptr->next != NULL)
        {
            ptr=ptr->next;
        }
        ptr->next=temp;
    }
    printf("%d pushed to the stack",temp->item);
    
}
void pop()
{
    struct node *prev;
    if(head==NULL)
    {
    printf("No element to delete...");
    }
    else
    {
    ptr=head;
    while(ptr->next != NULL)
        {
         prev=ptr;
         ptr=ptr->next;
        }
    
    }
    prev->next=NULL;
    printf("%d popped",ptr->item);
    free(ptr);
    
}

void display()
{
    if(head==NULL)
    {
        printf("Stack is empty...");
    }
    else
    {
        ptr=head;
        while(ptr != NULL)
        {
            printf("%d\t",ptr->item);
            ptr=ptr->next;
        }
    }
}
void main()
{
    int ch,item;
    printf("1.Create\n2.Push\n3.Pop");
    do{
    printf("\nEnter your choice:");
    scanf("%d",&ch); 
    switch(ch)
    {
        case 1:
        {
            create();
            break;
        }
        case 2:
        {
        printf("Enter the element to be added:");
        scanf("%d",&item);
        push(item);
        printf("\nCurrently the elements in the stack are:");
        display();
        break;
        }
        case 3:
        {
            pop();
            printf("\nCurrently the elements in the stack are:");
            display();
            break;
        }
        default:
        {
            printf("Invalid option...!");
            break;
        }
        
    }
}while(ch<4);
}
