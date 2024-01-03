class BankAccount:
    def __init__(self, account_number, account_holder_name, account_type, balance=0):
        self.account_number = account_number
        self.account_holder_name = account_holder_name
        self.account_type = account_type
        self.balance = balance

    def deposit(self, amount):
        if amount > 0:
            self.balance = self.balance + amount
            print("\nDeposition Successful!")
        else:
            print("\nInvalid amount!")

    def withdraw(self, amount):
        if 0 < amount < self.balance:
            self.balance = self.balance - amount
            print("Withdrawal successful")
            print("New Balance: ", self.balance)
        elif amount > self.balance:
            print("Not possible to withdraw. Insufficient funds.")
        else:
            print("Invalid amount!")

    def get_balance(self):
        return self.balance

account_number = input("Enter account number: ")
account_holder_name = input("Enter account holder name: ")
account_type = input("Enter account type: ")
initial_balance = float(input("Enter initial balance: "))

# Main Program
account1 = BankAccount(account_number, account_holder_name, account_type, initial_balance)

while True:
    print("\n1. Check Balance")
    print("2. Deposit")
    print("3. Withdraw")
    print("4. Exit")

    choice = input("Enter your choice (1/2/3/4): ")

    if choice == "1":
        print("Current balance:", account1.get_balance())
    elif choice == "2":
        deposit_amount = float(input("Enter the deposit amount: "))
        account1.deposit(deposit_amount)
    elif choice == "3":
        withdrawal_amount = float(input("Enter the withdrawal amount:"))
        account1.withdraw(withdrawal_amount)
    elif choice == "4":
        print("Exiting the program. Thank you!")
        break
    else:
        print("Invalid choice. Please enter a valid option.")
