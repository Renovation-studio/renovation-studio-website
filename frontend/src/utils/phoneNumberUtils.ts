export class PhoneNumber {
  private phoneRegex: RegExp;
  private formattingCharacters: Record<number, string>;

  constructor(config: { regex: RegExp, formatting: Record<number, string> }) {
    this.phoneRegex = config.regex;
    this.formattingCharacters = config.formatting;
  }

  processInput(value: string): { phoneNumber: string, formatted: string; isValid: boolean } {
    const cleanNumber = value.replace(/\D/g, "");
    let formatted = "";
    for (let i = 0; i < cleanNumber.length; i++) {
      if (this.formattingCharacters[i]) {
        formatted += this.formattingCharacters[i];
      }
      formatted += cleanNumber[i];
    }
    const isValid = this.phoneRegex.test(cleanNumber);
    return { cleanNumber, formatted, isValid };
  }
}
