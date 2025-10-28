export async function translate(key: string, lang: string = 'fr'): Promise<string> {
    const messages = await import(`../../lang/${lang}.json`);
    return messages[key] || key; // Return key if translation is missing
}