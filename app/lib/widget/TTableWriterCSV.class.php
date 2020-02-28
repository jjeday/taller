<?php
/**
 * Write tables in HTML
 * @author Renán Darío Gonzales Apaza
 */
class TTableWriterCSV implements ITableWriter
{
    private $separator;
    private $currentRow;
    private $colcounter;
    private $rows;
    
    /**
     * Constructor
     * @param $widths Array with column widths
     */
    public function __construct($separator = ',')
    {
        // armazena as larguras
        $this->separator = $separator;
        $this->rows = 0;
        
        // cria um array
        $this->table = array();
    }
    
    /**
     * Returns the native writer
     */
    public function getNativeWriter()
    {
        return new TAdiantiTable;
    }
    
    /**
     * Add a new style
     * @param @stylename style name
     * @param @fontface  font face
     * @param @fontsize  font size
     * @param @fontstyle font style (B=bold, I=italic)
     * @param @fontcolor font color
     * @param @fillcolor fill color
     */
    public function addStyle($stylename, $fontface, $fontsize, $fontstyle, $fontcolor, $fillcolor)
    {
        
    }
    
    /**
     * Add a new row inside the table
     */
    public function addRow()
    {
        $this->currentRow = $this->table[$this->rows++];
        $this->colcounter = 0;
    }
    
    /**
     * Add a new cell inside the current row
     * @param $content   cell content
     * @param $align     cell align
     * @param $stylename style to be used
     * @param $colspan   colspan (merge) 
     */
    public function addCell($content, $align, $stylename, $colspan = 1)
    {      
        $this->currentRow[$this->colcounter] = $content;
        $this->colcounter ++;
    }
    
    /**
     * Save the current file
     * @param $filename file name
     */
    public function save($filename)
    {
        ob_start();
        // insere os estilos no documento
        foreach ($this->table as $tr)
        {
            $row = array();
            foreach($tr as $td){
                $row[] = $td;
            }
            echo implode($this->separator,$row)."\n";
        }
        
        $content = ob_get_clean();
        file_put_contents($filename, $content);
        return TRUE;
    }
}
?>
