import java.rmi.Naming;
import java.util.Scanner;

public class LoanClient {

    public static void main(String[] args) {
        try {
            // Get loan details from the user
            Scanner scanner = new Scanner(System.in);

            System.out.print("Enter loan amount: RM ");
            double loanAmount = scanner.nextDouble();

            System.out.print("Enter loan duration (years): ");
            int numberOfYears = scanner.nextInt();

            System.out.print("Enter interest rate: ");
            double annualInterestRate = scanner.nextDouble();

            // Look up the remote object in the RMI registry
            LoanService loanService = (LoanService) Naming.lookup("rmi://localhost/LoanService");

            // Call the methods remotely
            double monthlyPayment = loanService.getMonthlyPayment(loanAmount, numberOfYears, annualInterestRate);
            double totalPayment = loanService.getTotalPayment(loanAmount, numberOfYears, annualInterestRate);

            // Display the results
            System.out.printf("Monthly Payment: RM %.2f%n", monthlyPayment);
            System.out.printf("Total Payment: RM %.2f%n", totalPayment);

        } catch (Exception e) {
            System.err.println("Client exception: " + e.getMessage());
            e.printStackTrace();
        }
    }
}
