import java.rmi.Naming;
import java.rmi.registry.LocateRegistry;

public class LoanServer {

    public static void main(String[] args) {
        try {
            // Start RMI registry
            LocateRegistry.createRegistry(1100);

            // Create a new instance of LoanServiceImpl
            LoanServiceImpl loanService = new LoanServiceImpl();

            // Bind the remote object to the RMI registry
            Naming.rebind("LoanService", loanService);

            System.out.println("Loan service is ready.");
        } catch (Exception e) {
            System.err.println("Error: " + e.getMessage());
            e.printStackTrace();
        }
    }
}
