<div class="box-container">
    <div class="input-box">
      <input type="text" class="inputbox" placeholder="0." readonly id="display" spellcheck="false">
    </div>
    <div class="container">
        <div class="box">
            <button onclick="clearDisplay()">C</button>
            <button onclick="appendToDisplay('(')">(</button>
            <button onclick="appendToDisplay(')')">)</button>
            <button onclick="appendToDisplay('*')">*</button>
        </div>
        <div class="box">
        <button onclick="appendToDisplay('7')">7</button>
        <button onclick="appendToDisplay('8')">8</button>
        <button onclick="appendToDisplay('9')">9</button>
        <button onclick="appendToDisplay('+')">+</button>
        </div>
        <div class="box">
            <button onclick="appendToDisplay('4')">4</button>
            <button onclick="appendToDisplay('5')">5</button>
            <button onclick="appendToDisplay('6')">6</button>
            <button onclick="appendToDisplay('-')">-</button>
        </div>
        <div class="box">
            <button onclick="appendToDisplay('1')">1</button>
            <button onclick="appendToDisplay('2')">2</button>
            <button onclick="appendToDisplay('3')">3</button>
            <button onclick="appendToDisplay('/')">/</button>
        </div>
        <div class="box">
            <button onclick="appendToDisplay('%')">%</button>
            <button onclick="appendTodisplay('0')">0</button>
            <button onclick="appendToDisplay('.')">.</button>
            <button onclick="calculateResult()">=</button>
        </div>
    </div>
</div>
<script>
        function appendToDisplay(value) {
            let decimalAdded = false;
            if (value === '.' && decimalAdded) {
            return; // Avoid adding multiple decimal points
            }
            document.getElementById('display').value += value;
            if (value === '.') {
                decimalAdded = true;
            }
        }

        function clearDisplay() {
            document.getElementById('display').value = '';
        }

        function calculateResult() {
            try {
                const expression = document.getElementById('display').value;
                let result;
                if (expression.includes('%')) {
                const operands = expression.split('%');
                if (operands.length === 2) {
                    const leftOperand = parseFloat(operands[0]);
                    const rightOperand = parseFloat(operands[1]);
                    if (!isNaN(leftOperand) && !isNaN(rightOperand)) {
                        result = leftOperand % rightOperand;
                    } else {
                        throw new Error('Invalid operands');
                    }
                } else {
                    throw new Error('Invalid expression');
                }
            } else {
                result = eval(expression);
            }
                document.getElementById('display').value = result;
            } catch (error) {
                document.getElementById('display').value = 'Error';
                decimalAdded = false;
            }
        }
    </script>