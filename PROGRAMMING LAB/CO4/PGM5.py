class Publisher:
    def __init__(self, name):
        self.name = name

class Book(Publisher):
    def __init__(self, name, title, author):
        super().__init__(name)
        self.title = title
        self.author = author

    def display(self):
        print("\nPublisher:", self.name)
        print("Title:", self.title)
        print("Author:", self.author)

class Python(Book):
    def __init__(self, name, title, author, price, no_of_pages):
        super().__init__(name, title, author)
        self.price = price
        self.no_of_pages = no_of_pages

    def display(self):
        super().display()
        print("Price:", self.price)
        print("Number of Pages:", self.no_of_pages)

publisher_name = input("Enter Publisher name: ")
book_title = input("Enter Book title: ")
book_author = input("Enter Book author: ")
book_price = float(input("Enter Book price: "))
book_pages = int(input("Enter Number of Pages: "))

python_book = Python(publisher_name, book_title, book_author, book_price, book_pages)

python_book.display()
